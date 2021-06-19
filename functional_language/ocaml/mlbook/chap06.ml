let rec double l =
    match l with
    | [] -> []
    | h::t -> (h * 2) :: double t

let rec evens l =
    match l with
    | [] -> []
    | h::t -> (h mod 2 = 0) :: evens t

let rec map f l =
    match l with
    | [] -> []
    | h::t -> f h :: map f t

let halve x = x / 2

