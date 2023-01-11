
n = int(input());

count = 0;

for i in range(1, n+1):
    # 각 자리수 더하기
    temp = i;
    sum = 0;
    while temp:
        sum += temp % 10;
        temp //= 10;

    if i % sum == 0:
        count += 1;

result = count;

print(result);

