module.exports = {
  apps : [{
    name: 'sinba-api',
    script: './dist',
    env: {
      NODE_ENV: 'development',
    },
    env_production: {
      NODE_ENV: 'production',
    },
    output: './logs/out.log',
    error: './logs/error.log',
    log: './logs/combined.outerr.log',
  }]
}
