package controllers;

import com.google.inject.Inject;
import java.util.List;
import javax.persistence.PersistenceException;
import play.data.*;
import play.libs.Json;
import play.Logger;
import play.mvc.*;

import views.html.index;
import views.html.unit.*;

import models.*;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public class UnitController extends Controller {
	private static Logger.ALogger logger = Logger.of(UnitController.class);

	@Inject
	FormFactory formFactory;

	public Result create() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}

		List<Unit> unitList = Unit.findAll();
		return ok(create.render(new Unit(), unitList));
	}

	public Result edit(Long id) {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}

		List<Unit> unitList = Unit.findAll();
		Unit unit = Unit.retrieve(id);
		System.out.println("Editando... Unit:");
		System.out.println(Json.toJson(unit));
		return ok(create.render(unit, unitList));
	}

	public Result delete(Long id) {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}

		Unit unit = Unit.retrieve(id);
		if(unit == null) {
			return notFound(id + " não consta no banco de dados.");
		}
		unit.delete();
		return redirect(routes.UnitController.create());
	}

	public Result save() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}

		DynamicForm form = formFactory.form().bindFromRequest();
		if(form.hasErrors()) {
		    System.out.println("Validação falhou");

			List<Unit> unitList = Unit.findAll();
		    return badRequest(
		    	create.render(new Unit(), unitList)
		    );
		}

		Unit unit = new Unit();
		unit.name = form.get("name");
		unit.symbol = form.get("symbol");
		if(unit != null) {
			unit.save();
			return redirect(routes.UnitController.create());
		}

		List<Unit> unitList = Unit.findAll();
	    return badRequest(
	    	create.render(new Unit(), unitList)
	    );
	}

}
