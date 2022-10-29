import AuthService from "../services/auth";

const auth = {
  namespaced: true,

  state: {
    user: { id: null, name: null, email: null },
    authorization: { accessToken: null }
  },

  getters: {
    hasToken: (state) => new Boolean(state.authorization.accessToken).valueOf(),

    getToken: (state) => (state.authorization.accessToken ?? null)
  },

  mutations: {
    setUser(state, user) {
      state.user = { ...user };
    },

    setAuthorization(state, authorization) {
      state.authorization = { ...authorization }
    }
  },

  actions: {
    makeLogin({ commit }, { email, password }) {
      const authService = new AuthService();

      return new Promise((resolve, reject) => {
        authService.login(email, password).then((response) => {
          commit('setUser', response.user);
          commit('setAuthorization', {
            accessToken: response.access_token
          });

          resolve(response.message);

        }).catch((error) => reject(error));
      });
    }
  }
};

export default auth;
