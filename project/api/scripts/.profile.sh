# export SINBA_TEST_DOMAIN=www.domain.name
# export SINBA_API_WORKSPACE="$SINBA_REPOS/project/api"

if [ \( -z "$SINBA_TEST_DOMAIN" \) -o \( -z "$SINBA_TEST_USER" \) -o \( -z "$SINBA_TEST_HOST" \) -o \( -z "$SINBA_API_WORKSPACE" \) ]
then
  echo "Required env vars are missing!"
  echo "Run the following commands:"
  echo "export SINBA_API_WORKSPACE=\"/path/to/repo/project/api\" # NOTICE: replace this path with the proper one"
  echo "export SINBA_TEST_DOMAIN=\"www.domain.name\" # NOTICE: replace this path with the proper one"
  echo "export SINBA_TEST_USER=\"user\" # NOTICE: replace this path with the proper one"
  echo "export SINBA_TEST_HOST=\"domain.name\" # NOTICE: replace this path with the proper one"
  echo "source /path/to/scripts/.profile.sh # NOTICE: replace this path with the proper one"
else
  export SINBA_API_SCRIPTS_DIR="$SINBA_API_WORKSPACE/scripts"
  export SINBA_API_BUILD_DIR="$SINBA_API_WORKSPACE/scripts/builds"

  # Build deployment package for server (branch develop)
  function sinba-build () {
    # # make sure branch is updated
    # echo "===> pulling and pushing local master..."
    # cd "$SINBA_API_WORKSPACE"
    # git co master
    # git pull
    # git push

    bash "$SINBA_API_SCRIPTS_DIR/build.sh"
  }

  function sinba-test-ssh () {
    ssh $SINBA_TEST_USER@$SINBA_TEST_HOST
  }

  function sinba-test-scp () {
    scp $* $SINBA_TEST_USER@$SINBA_TEST_HOST:~/
  }

  function sinba-test-ssh-t () {
    ssh -t $SINBA_TEST_USER@$SINBA_TEST_HOST $*
  }

  function sinba-test-deploy () {
    bash "$SINBA_API_SCRIPTS_DIR/test-deploy.sh"
  }
fi