#include <iostream> // input output stream
#include <vector> // 일종의 동적 배열인 vector를 위한 것
#include <algorithm> // for_each 쓰기 위한 모듈

using namespace std; // std라는 네임스페이스를 가져온다. 이 std 안에는 ctd, cout 등 필요한 것이 들어있음

int main(){
    ios_base::sync_with_stdio(false); // 입출력 빨라지게 하기 위한 것
    cin.tie(NULL);
    cout.tie(NULL);

    int dot_num;
    cin >> dot_num; // 단순 cin으로 받아버리면 뒤의 개행문자가 남기 때문에 좋지 않음

    long long dot_array[100000][3];
    // vector 자체 사용이 매우 느리므로 배열로 하기로 하겠음

    for (int i = 0; i < dot_num; i++)
    {
        long long x, y, z;

        cin >> x >> y >> z;

        dot_array[i][0] = x;
        dot_array[i][1] = y;
        dot_array[i][2] = z;
    }
    
    int query_num;
    cin >> query_num; 

    for (int i = 0; i < query_num; i++)
    {
        long long x, y, z, r;
        
        cin >> x >> y >> z >> r; // 기본적으로 cin은 공백을 기준으로 입력을 받음

        int now_count = 0;

        for (int j = 0; j < dot_num; j++)
        {
            long long dx = dot_array[j][0] - x;
            long long dy = dot_array[j][1] - y;
            long long dz = dot_array[j][2] - z;
            long long new_r = dx * dx + dy * dy + dz * dz;

            if (new_r <= r * r)
            {
                now_count++;
            }
        }
        
        cout << now_count << "\n";
    }

    return 0;
}
