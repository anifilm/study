-- 가드를 사용한 조건 분기
grade :: Int -> String
grade point
  | point > 90 = "A"
  | point > 80 = "B"
  | point > 70 = "C"
  | otherwise = "D"
