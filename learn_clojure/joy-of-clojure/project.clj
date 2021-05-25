(defproject joy-of-clojure "1.0.1"
  :description "Example sources for The Joy of Clojure(2nd edition)"
  :url "https://github.com/ksseono/the-joy-of-clojure"
  :license {:name "Eclipse Public License"
            :url  "http://www.eclipse.org/legal/epl-v10.html"}
  :dependencies [[org.clojure/clojure "1.10.1"]
                 [org.clojure/clojurescript "1.10.844"]
                 [org.clojure/core.unify "0.5.7"]
                 [org.clojure/core.logic "1.0.0"]
                 [cider/piggieback "0.5.2"]
                 [criterium "0.4.6"]]
  :source-paths ["src/clj/chap01" "src/clj/chap02" "src/clj/chap03" "src/clj/chap04" "src/clj/chap05"
                 "src/clj/chap06" "src/clj/chap07" "src/clj/chap08" "src/clj/chap09" "src/clj/chap10"
                 "src/clj/chap11" "src/clj/chap12" "src/clj/chap13" "src/clj/chap14" "src/clj/chap15"
                 "src/clj/chap16" "src/clj/chap17"]
  :plugins [[lein-cljsbuild "1.1.8"]]
  :cljsbuild
  {:builds
   [{:source-paths ["src/cljs"]
     :compiler
     {:output-to "dev-target/all.js"
      :optimizations :whitespace
      :pretty-print true}}
    {:source-paths ["src/cljs"]
     :compiler
     {:output-to "prod-target/all.js"
      :optimizations :advanced
      :externs ["externs.js"]
      :pretty-print false}}]}
  :repl-options {:nrepl-middleware [cider.piggieback/wrap-cljs-repl]})
