
res = ""

case = int(input())

for i in range(0, case):
    n = int(input())

    array = list(map(int, input().split(" ")))

    sum = 0

    for j in range(1, n):
        for k in range(0, j):
            if array[j] >= array[k]:
                sum += 1

    res += str(sum) + "\n"

print(res)