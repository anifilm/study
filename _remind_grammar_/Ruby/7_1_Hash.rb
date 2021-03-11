# 해시 (Hash)

my_hash = {
    "name" => "Dinah",
    "age" => 3
}
puts my_hash["name"] # "Dinah"

# Hash.new
cats = Hash.new() # {}
cats["name"] = "Dinah"
cats["age"] = 3

puts cats # {"name"=>"Dinah", "age"=>3}

# 키/값 쌍으로 삭제하기
cats.delete("age")

puts cats # {"name"=>"Dinah"}
