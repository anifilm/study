function love.load()
    target = {}
    target.x = 200
    target.y = 200
    target.radius = 50

    score = 0
    timer = 10
    gameState = 1

    gameFont = love.graphics.newFont(40)

    sprites = {}
    sprites.sky = love.graphics.newImage("sprites/sky.png")
    sprites.target = love.graphics.newImage("sprites/target.png")
    sprites.crosshair = love.graphics.newImage("sprites/crosshairs.png")
end

function love.update(dt)
    if gameState == 1 then return end

    if timer > 0 then
        timer = timer - dt
    end

    if timer <= 0 then
        timer = 0
        gameState = 1
    end
end

function love.draw()
    love.graphics.draw(sprites.sky, 0, 0)

    --love.graphics.setColor(255, 0, 0)
    --love.graphics.circle("fill", target.x, target.y, target.radius)
    if gameState == 2 then
        love.graphics.draw(sprites.target, target.x - target.radius, target.y - target.radius)
    end

    love.graphics.setColor(255, 255, 255)
    love.graphics.setFont(gameFont)
    love.graphics.print("Score: " .. score, 10, 5)
    love.graphics.print("Time: " .. math.ceil(timer), 300, 5)
    if gameState == 1 then
        love.graphics.printf("Click to start!", 0, 250, love.graphics.getWidth(), "center")
    end

    love.graphics.draw(sprites.crosshair, love.mouse.getX() - 20, love.mouse.getY() - 20)
    love.mouse.setVisible(false)
end

function love.mousepressed(x, y, button, istouch, presses)
    if button == 1 and gameState == 2 then
        local mouseToTarget = distanceBetween(x, y, target.x, target.y)
        if mouseToTarget < target.radius then
            score = score + 1
            target.x = math.random(target.radius, love.graphics.getWidth() - target.radius)
            target.y = math.random(target.radius, love.graphics.getHeight() - target.radius)
        end
    elseif button == 1 and gameState == 1 then
        gameState = 2
        score = 0
        timer = 10
    end
end

function distanceBetween(x1, y1, x2, y2)
    return math.sqrt((x2 - x1)^2 + (y2 - y1)^2)
end
