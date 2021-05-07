grade :: Int -> String
grade point
  | point > 90 = "A"
  | point > 80 = "B"
  | point > 70 = "C"
  | otherwise = "D"
