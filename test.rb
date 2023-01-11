
n = gets.chomp.to_i;

count = 0;

for i in 1..n do
    if i % i.to_s.split("").map(&:to_i).sum == 0
        count += 1;
    end
end

result = count;

puts result;
