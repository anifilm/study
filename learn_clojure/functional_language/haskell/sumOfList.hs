sumOfList :: [Int] -> Int
sumOfList [] = 0
sumOfList [a] = a
sumOfList (head:tail) = head + sumOfList tail
