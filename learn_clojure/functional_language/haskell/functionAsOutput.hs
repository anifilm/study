functionAsOutput :: Int -> (Int -> Int)
functionAsOutput x = (\y -> y + x)
