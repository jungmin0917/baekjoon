
n = gets.chomp.to_i;

result = 0;

for i in 1..n do
    a = gets.chomp.to_i;

	result += a;

	if i > 100000
        break;
    end
end

result = "#{i}\n#{result}";

puts result;