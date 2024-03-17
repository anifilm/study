goto room1 -- 시작하는 방

::room1::
do
    local move = io.read()
    if move == "south" then
        goto room3
    elseif move == "east" then
        goto room2
    else
        print("invalid move")
        goto room1 -- 이 방에 그대로 머문다
    end
end

::room2::
do
    local move = io.read()
    if move == "south" then
        goto room4
    elseif move == "east" then
        goto room1
    else
        print("invalid move")
        goto room2
    end
end

::room3::
do
    local move = io.read()
    if move == "south" then
        goto room1
    elseif move == "east" then
        goto room4
    else
        print("invalid move")
        goto room3
    end
end

::room4::
do print("Congratulations, you won!") end
