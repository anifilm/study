(defproject sicp "1.0.0"
  :description "Sources for SICP of Clojure"
  :url "http://example.com/FIXME"
  :license {:name "Eclipse Public License"
            :url "https://www.eclipse.org/legal/epl-2.0/"}
  :dependencies [[org.clojure/clojure "1.10.1"]]
  :source-paths ["src/chap01" "src/chap02" "src/chap03" "src/chap04" "src/chap05"]
  :main ^:skip-aot sicp.core
  :target-path "target/%s"
  :profiles {:uberjar {:aot :all
                       :jvm-opts ["-Dclojure.compiler.direct-linking=true"]}})
