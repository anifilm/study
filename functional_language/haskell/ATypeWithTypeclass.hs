data A = One | Two | Three

-- 타입 클래스
instance Show A where
  show One = "1"
  show Two = "2"
  show Three = "3"

-- Eq 타입 클래스
instance Eq A where
  One == One = True
  Two == Two = True
  Three == Three = True
  _ == _ = False

-- Ord 타입 클래스
instance Ord A where
  One <= One = True
  One <= Two = True
  One <= Three = True

  Two <= Two = True
  Two <= Three = True

  Three <= Three = True
  _ <= _ = False
