# 객체 클래스의 상속 리스트
p 'hello'.class     # String
p String.ancestors  # [String, Comparable, Object, Kernel, BasicObject]

p 10.class          # Fixnum
p Fixnum.ancestors  # [Integer, Numeric, Comparable, Object, Kernel, BasicObject]

p true.class        # TrueClass
p TrueClass.ancestors  # [TrueClass, Object, Kernel, BasicObject]

p nil.class         # NilClass
p NilClass.ancestors   # [NilClass, Object, Kernel, BasicObject]
