function love.load()
    target = {}
    target.x = 100
    target.y = 100
    target.radius = 50

    score = 0
    timer = 0

    gameFont = love.graphics.newFont(40)
end

function love.update(dt)

end

function love.draw()
    love.graphics.setColor(255, 0, 0)
    love.graphics.circle("fill", target.x, target.y, target.radius)

    love.graphics.setColor(255, 255, 255)
    love.graphics.setFont(gameFont)
    love.graphics.print("Score: " .. score, 10, 10)
end

function love.mousepressed(x, y, button, istouch, presses)
    if button == 1 then
        local mouseToTarget = distanceBetween(x, y, target.x, target.y)
        if mouseToTarget < target.radius then
            score = score + 1
        end
    end
end

function distanceBetween(x1, y1, x2, y2)
    return math.sqrt((x2 - x1)^2 + (y2 - y1)^2)
end
