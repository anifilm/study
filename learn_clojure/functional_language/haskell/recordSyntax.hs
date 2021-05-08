-- 레코드 문법
data A = One {
  name :: String,
  value :: Int
} | Two | Three

aFunc :: A -> String
aFunc (One name value) = name
aFunc Two = "two"
aFunc Three = "thr ee"
