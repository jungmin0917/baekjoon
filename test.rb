
c = gets.chomp.to_i;

result = "";

for i in 0..c-1 do
    temp = gets.chomp.to_i;
    n = gets.chomp.to_i;

    rest = 0;

    for j in 0..n-1 do
        candy = gets.chomp.to_i;
        
        rest += candy % n;
        rest %= n;
    end

    if rest > 0
        result += "NO\n";
    else
        result += "YES\n";
    end
end

puts result;
