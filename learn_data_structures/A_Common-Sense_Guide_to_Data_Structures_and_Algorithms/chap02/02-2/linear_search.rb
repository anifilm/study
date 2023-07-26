def lenear_search(array, search_value)
    # 배열의 모든 요소를 순회한다
    array.each_with_index do |element, index|
        # 원하는 값을 찾으면 해당 인덱스를 반환한다
        if element == search_value
            return index

        # 찾고 있던 값보다 큰 요소에 도달하면 루프를 일찍 종료할 수 있다.
        elsif element > search_value
            break
        end
    end

    # 배열에서 값을 찾지 못하면 널을 반환한다.
    return nil
end

p lenear_search([3, 17, 75, 80, 202], 22)
