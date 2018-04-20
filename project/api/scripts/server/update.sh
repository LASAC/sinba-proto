#!/bin/bash
#
# Server Update
# This script is used to install new versions of SINBA API
#
# TODO: make it zero-time update (but do it using node.js)
#   -> unpack in a folder containing a timestamp, 
#   -> to keep multi versions in the server
#

echo "=> making sure NVM is setup properly"
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion

echo "=> stopping server..."
pm2 stop sinba
echo "=> deleting previous backup"
rm -rf ~/sinba.last
echo "=> backing up current version..."
mv ~/sinba ~/sinba.last

echo "=> unpacking new version..."
mkdir ~/sinba
cd ~/sinba/
tar -xvzf ../sinba.tar.gz

# echo "=> restoring client public folder..."
# rsync -avzH --delete ~/sinba.last/dist/public/ ~/sinba/dist/public/

echo "=> restoring config.local.json ..."
if [ -f ~/sinba.last/dist/config/config.local.json ]; then
	rsync -avzH --delete ~/sinba.last/dist/config/config.local.json ~/sinba/dist/config/config.local.json
else
	echo "No config.local.json found - skipping."
fi

echo "=> installing dependencies..."
npm i

echo "=> starting server..."
pm2 start sinba -l ~/sinba-logs.log