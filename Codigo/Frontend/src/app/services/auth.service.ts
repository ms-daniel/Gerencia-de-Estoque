import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Login } from '../_models/login.model';

@Injectable({
  providedIn: 'root'
})

export class AuthService {
  private apiUrl = 'localhost:8000/api';

  constructor(private http: HttpClient) {}

  login(data: Login) {
    return this.http.post<Login>(this.apiUrl + '/login', data);
  }
}
