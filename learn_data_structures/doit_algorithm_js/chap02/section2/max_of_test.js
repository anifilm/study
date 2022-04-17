// 각 배열 원소의 최대값을 구해서 출력하기(튜플, 문자열, 문자열 리스트)
const {print, println} = require('./modules/print')
const {min, max} = require('./modules/array')

const t = [4, 7, 5.6, 2, 3.14, 1]
const s = 'string'
const a = ['DTS', 'AAC', 'FLAC']

println(`${t}의 최대값은 ${max(t)}입니다.`)
println(`${s}의 최대값은 ${max(s)}입니다.`)
println(`${a}의 최대값은 ${max(a)}입니다.`)
