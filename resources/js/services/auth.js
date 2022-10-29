import { Http } from "./http";

class AuthService {

  constructor() {
    this.httpClient = new Http();
  }

  login(email, password) {
    return new Promise((resolve, reject) => {
        const data = new FormData();

        data.append('email', email);
        data.append('password', password);

        this.httpClient.post('/auth/login', data).then((loginRequest) => {
            if(loginRequest.status === 200){
                resolve(loginRequest.data);
            }else{
                reject(loginRequest.data);
            }
        }).catch((error) => {
            reject(error);
        });
    });
  }

  logout() {

  }

  refreshToken() {

  }
};

export default AuthService;
