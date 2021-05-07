mymap :: (a -> b) -> [a] -> [b]
mymap fp [] = []
mymap fp [a] = [fp a]
mymap fp (head:tail) = fp head : mymap fp tail
