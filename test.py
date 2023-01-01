import math;

p, k = map(int, input().split());

result = "";

for i in range(2, k):
    if p % i == 0:
        result += "BAD " + str(i);
        break;
    
if not result:
    result = "GOOD";
    
print(result);