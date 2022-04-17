const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

const name = input('이름을 입력하세요: ')

println(`안녕하세요? ${name} 님`)
