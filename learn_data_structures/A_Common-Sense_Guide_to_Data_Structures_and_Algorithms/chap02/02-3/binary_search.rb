def binary_search(array, search_value)
    # 먼저 찾으려를 값이 있을 수 있는 상한선과 하한선을 정한다
    # 최초의 상한선은 배열의 첫번째 값, 하한선은 마지막 값이다
    lower_bound = 0
    upper_bound = array.length - 1

    # 상한선과 하한선 사이의 가운데 값을 계속해서 확인하는 루프를 시작한다
    while lower_bound <= upper_bound do
        # 상한선과 하한선 사이에 중간 지점을 찾는다 (결과값이 정수가 아닐까 봐 걱정할 필요 없다)
        # 루비는 정수를 나누기할 때 결과값을 가장 가까운 정수로 올림한다
        midpoint = (upper_bound + lower_bound) / 2

        # 중간 지점의 값을 확인한다
        value_at_midpoint = array[midpoint]

        # 중간 지점의 값이 찾고 있던 값이면 검색을 끝낸다
        # 그렇지 않으면 더 클지 작을지 추측한 바에 따라 상한선이나 하한선을 바꾼다
        if search_value == value_at_midpoint
            return midpoint
        elsif search_value < value_at_midpoint
            upper_bound = midpoint - 1
        elsif search_value > value_at_midpoint
            lower_bound = midpoint + 1
        end
    end

    # 상한선과 하한선이 같아질 때까지 경계값을 줄였다면 찾고 있는 값이 이 배열에 없다는 의미다
    return nil
end


p binary_search([3, 17, 75, 80, 202], 22)
