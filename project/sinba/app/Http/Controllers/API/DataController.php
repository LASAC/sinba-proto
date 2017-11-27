<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Log;

use App\Data;
use App\Http\Resources\Data as DataResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function __construct(Request $request, Data $data)
    {
        $this->request = $request;
        $this->model = $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minCollectDate = $this->extractDate($this->request->query->get('min-collect-date'));
        $result = [];

        $result = isset($minCollectDate)
            ? $this->model->fromDate($minCollectDate)
            : $this->model->all();

        return response()->json([
            'data' => $result
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'error' => 'Not supported'
        ], 400);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'error' => 'Not supported'
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DataResource($this->model->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            'error' => 'Not supported'
        ], 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'error' => 'Not supported'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'error' => 'Not supported'
        ], 400);
    }

    /**
     * Transforms a string in the format YYYYMMDDHHmmiiss into a DateTime object
     * @todo remove from here and add it into a helper file/class
     * @param  string $string
     * @return \DateTime
     */
    private function extractDate($string) {
        Log::debug(['DataController@extractDate($string): ', $string]);
        if (!$string) {
            Log::debug('DataController@extractDate(): nothing to extract...');
            return null;
        }

        $completeDate = str_pad($string, 14, '0');

        if (strlen($string) < 8) {

            $year = substr($completeDate, 0, 4);

            $month = substr($completeDate, 4, 2) ?? '01';
            if ($month === '00') {
                $month = '01';
            }

            $day = substr($completeDate, 6, 2) ?? '01';
            if ($day === '00') {
                $day = '01';
            }

            $completeDate = str_pad($year.$month.$day, 14, '0');
        }

        $date = date_create_from_format('YmdHis', $completeDate);
        Log::debug(['DataController@extractDate($date): ', $date]);
        if (!$date) {
            throw new Exception('Wrong Date Format! Provide at least the year: YYYYMMDDHHmmss');
        }
        return $date;
    }
}
