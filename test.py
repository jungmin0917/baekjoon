
result = "";

n = int(input());

seq = list(map(int, input().split()));

m = int(input());

for i in range(0, m):
    k, l, r = map(int, input().split());

    if k == 2:
        sum = 0;

        for j in range(l-1, r):
            sum += seq[j];

        result += str(sum) + "\n";

    else:
        for j in range(l-1, r):
            seq[j] = (seq[j] ** 2) % 2010;

print(result);