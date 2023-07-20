<template>
  <div class="login_total_container">
    <div class="tab-content">
      <div class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link" :class="{ active: activeOption === 'login' }" @click="activeOption = 'login'">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" :class="{ active: activeOption === 'register' }" @click="activeOption = 'register'">Register</a>
        </li>
      </div>
      <div class="tab-pane fade" :class="{ show: activeOption === 'login', active: activeOption === 'login' }"
        id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form @submit.prevent="submitLoginForm">
          <!-- Login form content -->
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input v-model="loginForm.email" type="email" id="loginName" class="form-control" placeholder="Email" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input v-model="loginForm.password" type="password" id="loginPassword" class="form-control" placeholder="Password" />
          </div>

          <!-- 2 column grid layout -->
          <div class="row_login mb-4">
            <!-- Checkbox and Forgot password link -->
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

          <!-- Register buttons -->
          <div class="text-center">
            <p>Not a member? <a href="#!" @click="activeOption = 'register'">Register</a></p>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" :class="{ show: activeOption === 'register', active: activeOption === 'register' }"
        id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form @submit.prevent="submitRegisterForm">
          <!-- Register form content -->
          <!-- Name input -->
          <div class="form-outline mb-4">
            <input v-model="registerForm.name" type="text" id="registerName" class="form-control" />
            <label class="form-label" for="registerName">Name</label>
          </div>

          <!-- Username input -->
          <!-- <div class="form-outline mb-4">
            <input v-model="registerForm.username" type="text" id="registerUsername" class="form-control" />
            <label class="form-label" for="registerUsername">Username</label>
          </div> -->

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input v-model="registerForm.email" type="email" id="registerEmail" class="form-control" />
            <label class="form-label" for="registerEmail">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input v-model="registerForm.password" type="password" id="registerPassword" class="form-control" />
            <label class="form-label" for="registerPassword">Password</label>
          </div>

          <!-- Repeat Password input -->
          <div class="form-outline mb-4">
            <input v-model="registerForm.repeatPassword" type="password" id="registerRepeatPassword" class="form-control" />
            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          </div>

          <!-- Checkbox -->
          <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
              aria-describedby="registerCheckHelpText" />
            <label class="form-check-label" for="registerCheck">
              I have read and agree to the terms
            </label>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import router from '../router';
export default {
  data() {
    return {
      activeOption: 'login',
      loginForm: {
        email: '',
        password: ''
      },
      registerForm: {
        name: '',
        email: '',
        password: '',
        repeatPassword: ''
      }
    };
  },
  methods: {
    submitLoginForm() {
      // Call the API with loginForm data
      // Replace the API_URL with your actual API endpoint
      axios
        .post("/api/user/login", this.loginForm)
        .then(response => {
          // Handle the API response
          console.log(response);
          if(response.data.message=='Login successful'){
            router.push('/');
          }else{
            router.push('/admin')
          }
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    },
    submitRegisterForm() {
      // Call the API with registerForm data
      // Replace the API_URL with your actual API endpoint
      axios
        .post('/api/user/register', this.registerForm)
        .then(response => {
          // Handle the API response
          console.log(response.data);
          if(response.data.message=='Register successful'){
            router.push('/');
          }
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    }
  }
};
</script>

<style scoped>
/* CSS styles here */
.login_total_container {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
