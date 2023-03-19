n, m = gets.chomp.split.map(&:to_i);

s = (n ** m).to_s;

len = s.length;

count = len / 70;

result = "";

for i in 0..count do
    sub = s.slice(70*i..70*(i+1)-1);

    result += sub + "\n";
end

puts result