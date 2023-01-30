
result = "";

while input = gets
    r, s = input.chomp.split();

    r = r.to_i;
    s = s.to_f;

    result += (((r * (s + 0.16)) / 0.067) ** 0.5).round().to_s + "\n";
end

puts result;