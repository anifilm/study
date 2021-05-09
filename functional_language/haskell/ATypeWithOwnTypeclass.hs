data A = One | Two | Three

-- 사용자 정의 타입 클래스
class ATypeClass a where
  myOp :: a -> a -> String

instance ATypeClass A where
  myOp One One = "One and One!"
  myOp _ _ = "Not (One and One)!"
