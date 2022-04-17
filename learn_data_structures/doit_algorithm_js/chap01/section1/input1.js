const {print, println} = require('./modules/print')
const input = require('prompt-sync')()

println('이름을 입력하세요.')
const name = input('>> ')

println(`안녕하세요? ${name} 님`)
