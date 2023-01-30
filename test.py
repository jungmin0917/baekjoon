
result = "";

a = int(input());
b = int(input());

b_arr = list(map(int, str(b)));

b_len = len(b_arr);

result += f"{a}\n{b}\n";

for i in range(b_len-1, -1, -1):
    result += str(a * b_arr[i]) + "\n";

result += str(a * b);

print(result);