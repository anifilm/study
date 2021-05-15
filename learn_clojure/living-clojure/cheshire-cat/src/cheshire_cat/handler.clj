(ns cheshire-cat.handler
  (:require [compojure.core :refer :all]
            [compojure.route :as route]
            [ring.middleware.defaults :refer [wrap-defaults site-defaults]]
            [cheshire.core :as json]))

(defroutes app-routes
  (GET "/" [] "Hello World")
  (GET "/cheshire-cat" [] "Smile!")
  (route/not-found "Not Found"))

(def app
  (wrap-defaults app-routes site-defaults))
