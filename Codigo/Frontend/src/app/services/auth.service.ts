import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Login } from '../_models/login';

@Injectable({
  providedIn: 'root'
})

export class AuthService {
  private apiUrl = 'http://localhost:8000/api';

  constructor(private http: HttpClient) {}

  login(data: Login) {
    return this.http.post(this.apiUrl + '/login', data, {
      withCredentials: true,
      observe: 'response'
    });
  }

  logout() {
    return this.http.post(`${this.apiUrl}/logout`, {}, {
       withCredentials: true,
       observe: 'response',
      });
  }

  getUsers() {
    this.http.get(`${this.apiUrl}/item`, { withCredentials: true })
      .subscribe(response => {
        return response;
      });
  }
}
