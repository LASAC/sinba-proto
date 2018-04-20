#!/bin/sh
set -x #echo on
set -e
set -o pipefail

#cleans build dir
rm -fr "$SINBA_API_BUILD_DIR"
mkdir -p "$SINBA_API_BUILD_DIR"

cd "$SINBA_API_WORKSPACE"

echo "### Start: Install Dependencies #################################################"
cd "$SINBA_API_WORKSPACE" && npm i
echo "### Done: Install Dependencies ##################################################"

echo "### Start: Build ################################################################"
cd "$SINBA_API_WORKSPACE" && npm run build
echo "### Done: Build #################################################################"

echo "### Start: Testing (requires built project) #####################################"
cd "$SINBA_API_WORKSPACE" && npm run lint
cd "$SINBA_API_WORKSPACE" && npm run test
echo "### Done: Testing ###############################################################"

echo "### Start: Packaging ############################################################"
rm -f "$SINBA_API_WORKSPACE"/dist/config/config.local.json
cd "$SINBA_API_WORKSPACE" && tar -czvf "$SINBA_API_BUILD_DIR/sinba.tar.gz" dist package.json
echo "### Done: Packaging #############################################################"
