local message = "lua is awesome!!!"
local condition = -25

if condition > 0 then
    message = "greater 0"
elseif condition < 0 then
    message = "less 0"
else
    message = "zero"
end

local function increaseMessage(num)
    message = message .. " " ..num
end

increaseMessage(25)

function love.draw()
    love.graphics.setFont(love.graphics.newFont(50))
    love.graphics.print(message)
end
