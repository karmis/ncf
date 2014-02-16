window.bs.nc.core.cron.crontab.add( new Cron.Job( "*/5 * * * * *", function () {
  console.log( "This message should run every 5 seconds" );
}));