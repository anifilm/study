package main

import (
	"github.com/gofiber/fiber/v2"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

func main() {
	conn, err := gorm.Open(mysql.Open(""), &gorm.Config{})

	if err != nil {
		panic("could not connect to the database")
	}

	app := fiber.New()

	app.Get("/", func(c *fiber.Ctx) error {
		return c.SendString("Hello, World 👋!")
	})

	app.Listen(":3000")
}
