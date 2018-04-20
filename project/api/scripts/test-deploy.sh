#!/bin/sh
source "$SINBA_API_SCRIPTS_DIR/.profile.sh"
set -x #echo on
set -e
set -o pipefail

echo "### Start: Send Package ###############################################################"
sinba-test-scp "$SINBA_API_BUILD_DIR/sinba.tar.gz"
echo "### Stop: Send Package ###############################################################"

echo "### Start: Run Remote Update ###############################################################"
sinba-test-ssh-t "bash ~/scripts/update.sh"
echo "### Start: Run Remote Update ###############################################################"
