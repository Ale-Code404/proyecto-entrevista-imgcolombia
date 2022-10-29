import store from './../store';

export class Http {
    axiosInstance = null;

    constructor() {
        if (!this.axiosInstance)
            this.axiosInstance = this.cretaeAxiosInstance();

        return this.axiosInstance;
    }

    cretaeAxiosInstance() {
      const axiosInstance = axios.create({
          //Base url with endpoint variable
          baseURL: import.meta.env.VITE_APP_API_URL,
          //Set if request is on base url
          isRoot: false,
          headers: {
            'Access-Control-Allow-Methods': 'GET, POST, PUT, PATH, HEAD, DELETE',
            'Access-Control-Allow-Headers': 'Content-Type, Accept, Authorization',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          //Receive all request response
          validateStatus: (status) => status >= 200 && status <= 510
      });

      axiosInstance.interceptors.request
        .use((config) => {
          //Retrive current token
          const token = store.getters['auth/getToken'];
          if (token) {
            if (!config.isRoot) {
                config.baseURL += `/${import.meta.env.VITE_APP_API_VERSION}`;
            }
            //Add Authorization header with Bearer token
            config.headers.Authorization = `Bearer ${token}`;
          }

          return config;
        }, (error) => {
            return Promise.reject(error);
        });

        return axiosInstance;
    }
};
