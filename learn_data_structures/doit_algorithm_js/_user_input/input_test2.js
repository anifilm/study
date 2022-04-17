const ps = require('./modules/ps');

let answer = '출력완료';

const solution = (input) => {
  //let N = input.splice(0, 1)[0];
  console.log(input);

  for (let i of ps.range(input)) {
    for (let j of ps.range(i+1)) {
      ps.write('*');
    }
    ps.writeLine();
  }

  return answer;
};

ps.main(async () => {
  let input1 = await ps.readLine();
  let input2 = await ps.readLine();

  console.log(solution(input1));
  console.log(solution(input2));
});
