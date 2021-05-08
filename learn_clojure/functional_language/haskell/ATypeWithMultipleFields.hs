-- 여러 타입의 조합
data A = One String Int | Two | Three

instance Show A where
  show (One str int) = str
  show Two = "2"
  show Three = "3"
