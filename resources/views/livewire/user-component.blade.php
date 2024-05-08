
<div>
  
<x-jet-dialog-modal wire:model="modalUser">
        <x-slot name="title">
            @if($accion=='add')
            {{ __('Registrar') }} 
            @else
            {{ __('Editar') }} - {{$nameedit}}
            @endif
           
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                 <div class="">
                     <label for="cost" class="block text-gray-700 text-sm font-bold">Nombre</label>
                        <input wire:model="name" type="text" name="name" id="name" placeholder="Ingrese el nombre"
                           class="block w-full bg-white-100 px-2 py-1  focus:ring-green-500 focus:border-green-500 rounded text-gray-500 focus:bg-white">
                     <x-jet-input-error for='name' />
                 </div>
                 <div class="">
                     <label for="lastname" class="block text-gray-700 text-sm font-bold">Apellido</label>
                        <input wire:model="lastname" type="text" name="lastname" id="lastname" placeholder="Ingrese el apellido"
                           class="block w-full bg-white-100 px-2 py-1  focus:ring-green-500 focus:border-green-500 rounded text-gray-500 focus:bg-white">
                     <x-jet-input-error for='lastname' />
                 </div>
             </div>
             <div class="grid grid-cols-2 gap-4">
                 <div class="">
                     <label for="" class="block text-gray-700 text-sm font-bold">Numero Telefono</label>
                        <input wire:model="phone_number" type="tel" name="phone_number" id="phone_number" placeholder="Ingrese  telefono"
                           class="block w-full bg-white-100 px-2 py-1  focus:ring-green-500 focus:border-green-500 rounded text-gray-500 focus:bg-white">
                     <x-jet-input-error for='phone_number' />
                 </div>

             </div>
             <div class="grid grid-cols-2 gap-4">
                 <div class="">
                     <label for="email" class="block text-gray-700 text-sm font-bold">Gmail</label>
                        <input wire:model="email" type="email" name="email" id="email" placeholder="ejemplo@gmail.com"
                           class="block w-full bg-white-100 px-2 py-1  focus:ring-green-500 focus:border-green-500 rounded text-gray-500 focus:bg-white">
                     <x-jet-input-error for='email' />
                 </div> 
                 
          
                 <div class="">
                     <label for="password" class="block text-gray-700 text-sm font-bold">

                        @if($accion=='add')
                        Contraseña
                        @else
                        Actualizar contraseña
                        @endif
                    </label>
                        <input wire:model="password" type="text" name="password" id="password" placeholder="Ingrese contraseña"
                           class="block w-full bg-white-100 px-2 py-1  focus:ring-green-500 focus:border-green-500 rounded text-gray-500 focus:bg-white">
                     <x-jet-input-error for='password' />
                 </div>
             </div>
        </x-slot>
        <x-slot name="footer">
             @if($accion=='add')
            <button wire:click="StoreUser()" type="button"
                class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-600 hover:bg-green-400 hover:shadow-lg">registrar
                </button>
             @else
             <button wire:click="updateUser()" type="button"
                class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-600 hover:bg-green-400 hover:shadow-lg">Actualizar
                </button>
            @endif
           
        </x-slot>
    </x-jet-dialog-modal>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div
                                    class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                    <input wire:model="search" type="text"  name="" id="" placeholder="Buscar..." class=" focus:ring-green-500 focus:border-green-500 border-gray-500 form-input rounded-full shadow-sm mt-1 block w-full">
                                    <select wire:model="showtable"  class=" focus:ring-green-500 focus:border-green-500 border-gray-500 form-input rounded-full shadow-sm mt-1 block w-1/5"
                                                style="" >
                                                 <option  value="0" selected>Activos</option> 
                                                 <option  value="1"  >Inactivo </option>
                                               </select>
                                    <div class="px-6 py-4 whitespace-nowrap align-text-center text-sm font-medium">
                                        <a wire:click="openUserModal()" href="#"
                                            class="bg-green-600 mx-1 inline-block border border-green-600   rounded py-1 px-3  text-white">Nuevo Usuario</a>
                                    </div>
                                </div>
                                @if ($users->count())
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Apellido
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Numero de telefono
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Gmail
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Constraseña
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->name }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->lastname }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->phone_number }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->email }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                {{ substr($user->password, 0, 20) }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    @if($showtable==1)
                                                    <td class="px-6 py-4 ">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $user->date_removal }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                  
                                                    <td
                                                        class="px-1 py-1 ">
                                                        <a wire:click="recoverUser({{ $user->id }})" href="#"
                                                            class="text-green-600 hover:text-green-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                                           </svg>
                                                        </a>
                                                    </td>
                                                    @else

                                                    <td
                                                        class="px-1 py-1 ">
                                                        <a wire:click="editUser({{ $user }})" href="#"
                                                            class="text-green-600 hover:text-green-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                               <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                  <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                           </svg>
                                                        </a>
                                                    </td>
                                                  
                                                    <td
                                                        class="px-1 py-1 ">
                                                        <a wire:click="deleteUser({{ $user->id }})" href="#"
                                                            class="text-green-600 hover:text-green-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                 <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                    @endif
                                                 
                                                </tr>
                                            @endforeach
                                            <!-- More items... -->
                                        </tbody>
                                    </table>
                                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                        {{ $users->links() }}
                                    </div>
                                @else
                                    <div
                                        class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 text-gray-500 text-sm">
                                        No existen resultados para {{ $search }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
