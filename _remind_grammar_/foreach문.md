# C
지원안함

# C++ (범위기반 for문)
for (auto value : array) {

# JAVA (향상된 for문)
for (var value : array) {

# Golang (for문 응용)
for key, value := range items {

# JavaScript (for..in, for..of)
for (const key in array) {    // 배열의 인덱스를 받아옴
for (const value of array) {  // 배열의 요소를 받아옴

array.forEach(item => {
    console.log(item);
});

# 파이썬
for item in array:

# 루비
for item in array; end

array.each do |item|
    puts item
end

# PHP
foreach ($array as $value) {
foreach ($array as $key => $value) {

# Kotlin (향상된 for문, forEach)
for (item in array) {
for (index in array.indices) {  // 배열 인덱스를 받아옴
for ((index, value) in array.withIndex) {  // 인덱스와 값 모두 사용시

array.forEach { item -> println(item) }
array.forEach { println(it) }

array.forEachIndexed { index, value ->

# C Sharp (foreach 사용)
foreach (var item in array) {

# Swift
for value in array {

array.forEach { (item) in
array.forEach { print($0) }

# Dart
for (var item in array) {

array.forEach((item) =>
