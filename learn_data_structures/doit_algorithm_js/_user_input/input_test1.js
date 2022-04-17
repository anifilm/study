const ps = require('./modules/ps');

ps.main(async () => {
  let line1 = await ps.readLine();
  let line2 = await ps.readLine();

  ps.writeLine('Line 1: ' + line1);
  ps.writeLine('Line 2: ' + line2);
});
